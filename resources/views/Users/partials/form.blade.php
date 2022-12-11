<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ isset($user->name)? $user->name: old('name') }}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ isset($user->email)? $user->email: old('email') }}">
</div>
<div class="form-group">
    <label for="name">Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <small id="passwordHelp" class="form-text text-muted">Minimo 8 caracteres @if(isset($user)) , dejar vacio si no se desea modificar @endif</small>
</div>
<div class="form-group mt-4">
    <button type="submit" class="btn btn-primary">@if(isset($user)) Modificar @else Guardar @endif</button>
    <button type="reset" class="btn btn-danger">Borrar</button>
</div>