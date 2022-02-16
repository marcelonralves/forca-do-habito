warning: LF will be replaced by CRLF in app/Http/Controllers/Admin/Reports/ReportController.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/_layout.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/form/customer.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/form/user.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/reports/category.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/reports/customer.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in resources/views/admin/reports/user.blade.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in routes/web.php.
The file will have its original line endings in your working directory
[1mdiff --git a/app/Http/Controllers/Admin/Reports/ReportController.php b/app/Http/Controllers/Admin/Reports/ReportController.php[m
[1mindex fb2e580..549e1d9 100644[m
[1m--- a/app/Http/Controllers/Admin/Reports/ReportController.php[m
[1m+++ b/app/Http/Controllers/Admin/Reports/ReportController.php[m
[36m@@ -7,6 +7,7 @@[m
 use App\Models\Customer;[m
 use App\Models\User;[m
 use Illuminate\Http\Request;[m
[32m+[m[32muse Illuminate\Support\Facades\Hash;[m
 [m
 class ReportController extends Controller[m
 {[m
[36m@@ -90,4 +91,24 @@[m [mpublic function deleteUserReport(Request $request, int $id)[m
 [m
         return back()->with('message', 'Usuário(a) deletado(a) som sucesso!');[m
     }[m
[32m+[m
[32m+[m[32m    public function postUserPassReport(Request $request, int $id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $request->merge(["id" => $id]);[m
[32m+[m[32m        $this->validate($request, [[m
[32m+[m[32m            'id' => 'required|exists:users,id',[m
[32m+[m[32m            'new_password' => 'required',[m
[32m+[m[32m            'repeat_new_password' => 'required'[m
[32m+[m[32m        ]);[m
[32m+[m
[32m+[m[32m        if($request->input('new_password') != $request->input('repeat_new_password')){[m
[32m+[m[32m            return back()->withErrors('As senhas não conferem');[m
[32m+[m[32m        }[m
[32m+[m
[32m+[m[32m        $user = User::find($id);[m
[32m+[m[32m        $user->password = Hash::make($request->input('new_password'));[m
[32m+[m[32m        $user->save();[m
[32m+[m
[32m+[m[32m        return back()->with('message', 'As senhas foi atualizada com sucesso');[m
[32m+[m[32m    }[m
 }[m
[1mdiff --git a/resources/views/admin/_layout.blade.php b/resources/views/admin/_layout.blade.php[m
[1mindex c5e912f..dc3fa84 100644[m
[1m--- a/resources/views/admin/_layout.blade.php[m
[1m+++ b/resources/views/admin/_layout.blade.php[m
[36m@@ -33,14 +33,14 @@[m
                 </div>[m
             </li>[m
 [m
[31m-            @if(\Illuminate\Support\Facades\Auth::user()->profile != "Visualizar")[m
[32m+[m[32m            @if(\Illuminate\Support\Facades\Auth::user()->profile != "visualizar")[m
             <li class="nav-item dropdown">[m
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">[m
                     Relatório[m
                 </a>[m
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">[m
                     <a class="dropdown-item" href="{{ route('admin.show.customer.report') }}">Cliente</a>[m
[31m-                    <a class="dropdown-item" href="{{ route('admin.show.user.report') }}">Usuários</a>[m
[32m+[m[32m                    <a class="dropdown-item" href="{{ route('admin.show.user.report') }}">Usuário</a>[m
                     <a class="dropdown-item" href="{{ route('admin.show.category.report') }}">Categoria</a>[m
                 </div>[m
             </li>[m
[1mdiff --git a/resources/views/admin/form/customer.blade.php b/resources/views/admin/form/customer.blade.php[m
[1mindex a7bc247..12660dc 100644[m
[1m--- a/resources/views/admin/form/customer.blade.php[m
[1m+++ b/resources/views/admin/form/customer.blade.php[m
[36m@@ -26,8 +26,8 @@[m
                     <div class="form-group">[m
                         <label for="profile">Perfil</label>[m
                         <select class="form-control" name="profile" id="profile">[m
[31m-                            <option value="visualizador">Visualizador</option>[m
[31m-                            <option value="administrador">Administrador</option>[m
[32m+[m[32m                            <option value="visualizar">Visualizador</option>[m
[32m+[m[32m                            <option value="administrar">Administrador</option>[m
                         </select>[m
                     </div>[m
                 </div>[m
[1mdiff --git a/resources/views/admin/form/user.blade.php b/resources/views/admin/form/user.blade.php[m
[1mindex e48b2a0..3006c59 100644[m
[1m--- a/resources/views/admin/form/user.blade.php[m
[1m+++ b/resources/views/admin/form/user.blade.php[m
[36m@@ -20,14 +20,17 @@[m
                         <input type="text" class="form-control" id="username" name="username" value="{{ $user->username ?? '' }}" placeholder="ex: marceloadmin">[m
                     </div>[m
                     @if(!isset($user))[m
[31m-                    <div class="form-group">[m
[31m-                        <label for="password">Senha</label>[m
[31m-                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Senha">[m
[31m-                    </div>[m
[32m+[m[32m                        <div class="form-group">[m
[32m+[m[32m                            <label for="password">Senha</label>[m
[32m+[m[32m                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Senha">[m
[32m+[m[32m                        </div>[m
                     @endif[m
                     <div class="form-group">[m
                         <label for="profile">Perfil</label>[m
[31m-                       <input type="text" class="form-control" id="profile" value="{{ $user->profile ?? '' }}" name="profile">[m
[32m+[m[32m                        <select class="form-control" name="profile" id="profile">[m
[32m+[m[32m                            <option value="visualizar">Visualizador</option>[m
[32m+[m[32m                            <option value="administrar">Administrador</option>[m
[32m+[m[32m                        </select>[m
                     </div>[m
                 </div>[m
 [m
[36m@@ -37,4 +40,30 @@[m
             </form>[m
         </div>[m
     </div>[m
[32m+[m
[32m+[m[32m    @if(isset($user))[m
[32m+[m[32m        <div class="col-md-12">[m
[32m+[m[32m            <div class="card card-primary">[m
[32m+[m[32m                <div class="card-header">[m
[32m+[m[32m                    <h3 class="card-title">Alterar Senha</h3>[m
[32m+[m[32m                </div>[m
[32m+[m[32m                <div class="card-body">[m
[32m+[m[32m                    <form method="post" action="{{ route('admin.post.password', ['id' => $user->id]) }}">[m
[32m+[m[32m                        @csrf[m
[32m+[m[32m                        <div class="form-group">[m
[32m+[m[32m                            <label for="new_password">Nova Senha</label>[m
[32m+[m[32m                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nova Senha">[m
[32m+[m[32m                        </div>[m
[32m+[m[32m                        <div class="form