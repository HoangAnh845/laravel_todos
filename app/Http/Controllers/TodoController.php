<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\search;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DESC là giảm dần
        // ASC là tăng dần
        $todoList = Todos::where('user_id', Auth::id())->orderBy('id', 'ASC')->paginate(5);
        $user = User::where('id', Auth::id())->first();
        $checkList =  DB::table('todos')->where('user_id', Auth::id())->first();

        Log::info("TodoList", [
            '$todoList' => $todoList,
            // "tod" =>Todos::where('user_id', Auth::id()
        ]);

        return view('todo.list', [
            "todoList" => $todoList,
            "checkList" => $checkList,
            "user" => $user
        ]);
    }

    public function search(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $searchText = $request->input('textSearch');
        $searchSatus = $request->input('status');
        $searchDate = $request->input('start_date');


        $todoQuery = DB::table('todos');

        if ($searchText !== null) {
            $todoQuery->where('name', 'Like', '%' . $searchText . '%');
        }
        if ($searchSatus !== null) {
            $todoQuery->where('status', $searchSatus);
        }
        if ($searchDate !== null) {
            $todoQuery->where('start_date', $searchDate);
        }

        $todoList = $todoQuery->orderBy('id', 'ASC')->paginate(5);

        // Trường hợp không tìm thấy
        if ($todoList->isEmpty()) {
            $checkList = null;
        } else {
            $checkList = true;
        }

        Log::info('Input data', [
            // 'searchDate' => $searchDate,
            '$request->input' => $todoList->isEmpty(),
            "todoList" => $todoList,
        ]);

        return view('todo.list', [
            "todoList" => $todoList,
            "checkList" => $checkList,
            "user" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
            'status' => 'nullable',
            'tags' => 'required',
            'start_date' => 'required|date',
            'note' => 'nullable', // giá trị có thể bị null
            'des' => 'nullable',
        ], [
            'name.required' => 'Vui lòng nhập đầy đủ tên công việc',
            'name.min' => 'Vui lòng nhập tên ít nhất 5 ký tự',
            'name.max' => 'Vui lòng nhập tên nhiều nhất 50 ký tự',
            'tags.required' => 'Vui lòng chọn tag',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu',
        ]);
        if (Auth::check()) {
            // The user is logged in...
            Todos::create([
                'name' => $request->input('name'),
                'status' => 'Not started',
                'tags' => $request->input('tags'),
                'start_date' => $request->input('start_date'),
                'note' => $request->input('note'),
                'des' => $request->input('des'),
                // Truy cập thuộc tính id của người dùng được xác thực
                'user_id' => Auth::user()->id,
            ]);
        } else {
            // The user is not logged in...
            return redirect('/login')->with('flash_notification.message', 'You must be logged in to create a todo.');
        }

        // Redirect to the index page or do something else
        return redirect('/todo/list')->with('flash_notification.message', 'Todo created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = DB::table('todos')->where('id', $id)->first();
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('todos')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'tags' => $request->input('tags'),
                'start_date' => $request->input('start_date'),
                'note' => $request->input('note'),
                'des' => $request->input('des'),
            ]);
        return redirect('/todo/list')->with('flash_notification.message', 'Todo update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::check()) {
            DB::table('todos')->where('id', $id)->delete();
            return redirect('/todo/list')
                ->with('flash_notification.message', 'Todo deleted successfully');
        } else {
            return redirect('/login');
        }
    }
}
