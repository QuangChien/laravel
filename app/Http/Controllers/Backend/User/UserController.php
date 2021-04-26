<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{     
    use StorageImageTrait;
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        $users = $this->user->paginate(5);
        return view('backend.users.listuser',compact('users'));
    }

    public function create(Request $request){
        return view('backend.users.adduser');
    }

    public function store(AddUserRequest $request){
        try {
            $userCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ];
    
            $dataImageUpload = $this->storageTraitUpload($request->avatar, 'user');
            if($dataImageUpload !==null){
                $userCreate['avatar'] = $dataImageUpload['name'];
                $userCreate['avatar_path'] = $dataImageUpload['path'];
            }
    
            $user = $this->user->create($userCreate);
            DB::commit();

            return redirect()->route('user.index')->with('success', 'Đã thêm thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
        }
    }

    public function edit($id){
        $user = $this->user->find($id);
        return view('backend.users.edituser',compact('user'));
    }

    public function update(EditUserRequest $request, $id){
        try {
            
            $userUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];

            if($request->password !==null){
                $userUpdate['password'] = Hash::make($request->password);
            }

            $dataImageUpload = $this->storageTraitUpload($request->avatar, 'user');
            if($dataImageUpload !==null){
                $userUpdate['avatar'] = $dataImageUpload['name'];
                $userUpdate['avatar_path'] = $dataImageUpload['path'];
            }
    
            $user = $this->user->find($id)->update($userUpdate);
            DB::commit();

            return redirect()->route('user.index')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
        }
    }

    public function delete($id){
        try {
            $user = $this->user->find($id);
            if($user->role == 1){
                return false;
            }

            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
            

        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
