<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\Constant;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function createNews(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|max:255',
            'des' => 'required',
            'short_des' => 'required',
            'title_go' => 'required',
            'keyword_go' => 'required',
            'category_id' => 'required'
        ]);

        try {
            $slug = Constant::createUniqueSlug($validated['name']);
            // Create a new post
            $post = News::create([
                'name' => $validated['name'],
                'des' => $validated['des'],
                'short_des' => $validated['short_des'],
                'images' => $request['images'],
                'title_go' => $validated['title_go'],
                'keyword_go' => $validated['keyword_go'],
                'slug' => $slug,
                'category_id' => $validated['category_id'],
            ]);

            // Return the created post as a response
            return response()->json([
                'success' => true,
                'message' => 'News created successfully',
                'data' => $post,
            ], 201);
        } catch (\Exception $e) {

            // Return an error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to create news',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function updateNews(Request $request, $id)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|max:255',
            'des' => 'required',
            'short_des' => 'required',
            'title_go' => 'required',
            'keyword_go' => 'required',
            'category_id' => 'required'
        ]);

        try {
            // Tìm bài viết theo ID
            $post = News::findOrFail($id);

            // Cập nhật bài viết
            $post->update([
                'name' => $validated['name'],
                'des' => $validated['des'],
                'short_des' => $validated['short_des'],
                'images' => $request->has('images') ? $request['images'] : $post->images,  // Nếu có hình ảnh mới thì cập nhật, nếu không giữ nguyên
                'title_go' => $validated['title_go'],
                'keyword_go' => $validated['keyword_go'],
                'category_id' => $validated['category_id'],
            ]);

            // Trả về kết quả thành công
            return response()->json([
                'success' => true,
                'message' => 'News updated successfully',
                'data' => $post,
            ], 200);
        } catch (\Exception $e) {
            // Trả về lỗi nếu có
            return response()->json([
                'success' => false,
                'message' => 'Failed to update news',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function getNewsDetails($id)
    {
        try {
            // Tìm bài viết theo ID
            $post = News::findOrFail($id);

            // Trả về kết quả thành công với thông tin bài viết
            return response()->json([
                'success' => true,
                'message' => 'News details retrieved successfully',
                'data' => $post,
            ], 200);
        } catch (\Exception $e) {
            // Trả về lỗi nếu không tìm thấy bài viết
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve news details',
                'error' => $e->getMessage(),
            ], 404);
        }
    }
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try {
            $path = $request->file('image')->store('uploads', 'public');

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully',
                'data' => [
                    'path' => asset('storage/' . $path),
                ],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $post = News::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }

        // Xóa bài viết
        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);
    }

    public function getList()
    {
        // Get all posts from database
        $posts = News::all();

        // Return the posts as JSON
        return response()->json($posts, 200);
    }
}
