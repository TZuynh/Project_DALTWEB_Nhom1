<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $contacts = Contact::where('id', (int) $request->search)->paginate(5);
        } else {
            $contacts = Contact::paginate(5);
        }
        $allContacts = Contact::all(); // Lấy tất cả liên hệ
        return view('admin.contacts.index', compact('contacts','allContacts')); // Truyền dữ liệu tới view
    }

    // Hiển thị form chỉnh sửa liên hệ
    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        $allContacs = Contact::all();
        return view('admin.contacts.edit', compact('contacts')); // Truyền liên hệ cần sửa tới view
    }

    // Xử lý cập nhật thông tin liên hệ
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Cập nhật thông tin liên hệ
        $contacts = Contact::findOrFail($id);
        $contacts->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('admin.contacts.index')->with('success', 'Liên hệ đã được cập nhật!');
    }

    // Xử lý xóa liên hệ
    public function destroy($id)
    {
        try {
            // Tìm liên hệ theo ID
            $contacts = Contact::findOrFail($id);
    
            // Xóa liên hệ
            $contacts->delete();
    
            // Điều hướng về danh sách liên hệ kèm thông báo thành công
            return redirect()->route('admin.contacts.index')->with('success', 'Liên hệ đã được xóa!');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa liên hệ.');
        }
    }
}
