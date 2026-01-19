<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('sort_order')->paginate(3);
        return view('admin.slideshow.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slideshow.create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'url'         => 'nullable|string|max:255',
            'sort_order'  => 'required|integer',
            'status'      => 'required|boolean',
            'image'       => 'required|shop_image',
        ]);

        // Upload ảnh
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();

        // lưu tên file vào DB
        $data['image'] = $fileName;

        Slide::create($data);

        return redirect()->route('admin.slideshow.index')->with('success', 'Thêm slide thành công');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slideshow.edit', compact('slide'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'url'         => 'nullable|string|max:255',
            'sort_order'  => 'required|integer',
            'status'      => 'required|boolean',
            'image'       => 'nullable|shop_image'
        ]);

        // Nếu có upload ảnh mới
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('', $fileName, 'public');

            $data['image'] = $fileName;
        }

        $slide->update($data);

        return back()->with('success', 'Cập nhật slide thành công!');
    }

    /**
     * DESTROY
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        $slide->delete();

        return back()->with('success', 'Đã xóa slide thành công!');
    }
}
