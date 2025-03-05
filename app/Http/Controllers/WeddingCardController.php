<?php

namespace App\Http\Controllers;

use App\Models\WeddingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeddingCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cards = DB::table('wedding_cards')->first();
        $image = "https://vstatic.vietnam.vn/vietnam/resource/IMAGE/2025/1/18/96df3e2dca9f438eb608e499b87a549b" ;
        return view('welcome');
    }

    public function showWeddingCard($key) {
        // Tìm thiệp cưới theo key
        $weddingCard = WeddingCard::where('id', $key)->first();

        if (!$weddingCard) {
            abort(404, 'Thiệp cưới không tồn tại');
        }
        return view('template01',compact('weddingCard')) ;
        // Trả về view wedding.blade.php với dữ liệu từ database
       // return view('wedding.index', compact('weddingCard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weddingform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'bride_name' => 'required|string|max:255',
                'groom_name' => 'required|string|max:255',
                'banner_top' => 'required|string|max:255',
                'wedding_date' => 'required|date',
                'address_wedding' => 'required|string|max:255',
                'address_wedding_map' => 'required|string|max:500',
                'bride_birthday' => 'required|date',
                'groom_birday' => 'required|date',
                'bride_avatar' => 'required|string|max:500',
                'groom_avatar' => 'required|string|max:500',
                'banner_coundown' => 'required|string|max:500',
                'album' => 'required|string|max:5000',
                'date_coundown' => 'required|string|max:500',
                'address_groom' => 'required|string|max:500',
                'address_bride' => 'required|string|max:500',
                'time_groom' => 'required|string|max:500',
                'time_groom_al' => 'required|string|max:500',
                'time_bride' => 'required|string|max:500',
                'time_bride_al' => 'required|string|max:500',
                'bride_phone' => 'required|string|max:15',
                'groom_phone' => 'required|string|max:15',
             
                'groom_qr' => 'required|string|max:500',
                'bride_qr' => 'required|string|max:500',
                'groom_map' => 'required|string|max:500',
                'bride_map' => 'required|string|max:500',
            ]);
    
        // 2️⃣ Tạo thiệp cưới trước để lấy ID
        $weddingCard = WeddingCard::create($validated);
        $weddingId = $weddingCard->id; // Lấy ID của thiệp vừa tạo
    
        // 3️⃣ Lưu ảnh vào thư mục public/{id}
        $imagePaths = [];
    
        if ($request->hasFile('image')) {
           
            foreach ($request->file('image') as $image) {
            
                $path = $image->store("weddings/$weddingId", 'public');
                $imagePaths[] = Storage::url($path);
            }
        }
    
        // 4️⃣ Cập nhật đường dẫn ảnh vào database
        $weddingCard->update(['album' => json_encode($imagePaths)]);

        

        // Trả về view với thông báo thành công
        return redirect()->route('wedding.create')->with('success', 'Lưu thiệp cưới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($key)
    {
      // Tìm thiệp cưới theo key
      $weddingCard = DB::table('wedding_cards')->where('id', $key)->first();

      if (!$weddingCard) {
          abort(404, 'Thiệp cưới không tồn tại');
      }
      return view('template01',compact('weddingCard')) ;
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $weddingCard = WeddingCard::findOrFail($key);
        return view('weddingform', compact('weddingCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $key)
    {
        $data = $request->validate([
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'banner_top' => 'required|string|max:255',
            'wedding_date' => 'required|date',
            'address_wedding' => 'required|string|max:255',
            'address_wedding_map' => 'required|string|max:500',
            'bride_birthday' => 'required|date',
            'groom_birday' => 'required|date',
            'bride_avatar' => 'required|string|max:500',
            'groom_avatar' => 'required|string|max:500',
            'banner_coundown' => 'required|string|max:500',
            'album' => 'required|string|max:5000',
            'date_coundown' => 'required|string|max:500',
            'address_groom' => 'required|string|max:500',
            'address_bride' => 'required|string|max:500',
            'time_groom' => 'required|string|max:500',
            'time_groom_al' => 'required|string|max:500',
            'time_bride' => 'required|string|max:500',
            'time_bride_al' => 'required|string|max:500',
            'bride_phone' => 'required|string|max:15',
            'groom_phone' => 'required|string|max:15',
         
            'groom_qr' => 'required|string|max:500',
            'bride_qr' => 'required|string|max:500',
            'groom_map' => 'required|string|max:500',
            'bride_map' => 'required|string|max:500',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $weddingCard = WeddingCard::findOrFail($key);
        $weddingCard->update($data);

        return redirect()->route('wedding.edit', $key)->with('success', 'Cập nhật thiệp cưới thành công!');
    }

 /**
     * Show the form for creating a new resource.
     */
    public function creates()
    {
        return view('imageupload');
    }

    // Xử lý cập nhật ảnh
    public function updateImage(Request $request)
    {
        // // Kiểm tra file có tồn tại
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Giới hạn 2MB
        // ]);

        // // Lưu ảnh vào thư mục storage/app/public/images
        // $path = $request->file('image')->store('images', 'public');

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('uploads', 'public'); // Lưu vào thư mục storage/app/public/uploads
                $imagePaths[] = $path;
            }
        }

        return response()->json([
            'message' => 'Upload thành công!',
            'paths' => $imagePaths
        ]);

       // return back()->with('success', 'Ảnh đã được tải lên thành công!')->with('image', $path);
       return $path;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeddingCard $weddingCard)
    {
        //
    }
}
