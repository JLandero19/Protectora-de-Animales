<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar un usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="users">Usuarios</a></li>
                        <li class="breadcrumb-item active">Editar Usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-white">Editar usuario</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="POST" action="edit-user" enctype="multipart/form-data">
                        <input type="hidden" name="role_id" id="role_id" value="<?php echo $data['role_id']; ?>" />
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>" />
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6 mb-3">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $data['name']; ?>" required />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="lastname">Apellidos</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" value="<?php echo $data['lastname']; ?>" required />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="dni">DNI</label>
                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="12345678A" maxlength="9" value="<?php echo $data['dni']; ?>" required />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="tlf">Teléfono</label>
                                    <input type="text" class="form-control" name="tlf" id="tlf" placeholder="959111111" maxlength="9" value="<?php echo $data['tlf']; ?>" required />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com" value="<?php echo $data['email']; ?>" required />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="profile">Perfil</label>
                                    <select class="form-control" name="profile" id="profile">
                                        <option value="">Seleccione un perfil</option>
                                        <option value="" <?php echo $data['profile'] == null ? 'selected' : ''; ?> >Cliente</option>
                                        <option value="admin" <?php echo $data['profile'] == "admin" ? 'selected' : ''; ?> >Administrador</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" />
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="confirm_password">Verificar contraseña</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Verificar Contraseña" />
                                </div>                                
                                <div class="form-group col-12">
                                    <div class="panel">Imagen</div>
                                    <input type="file" class="nuevaFoto" name="image" id="image" />
                                    <p class="help-block1">Peso máximo de la foto 2MB.</p>
                                    <img src="../views/images/users/<?php echo $data['image'] == null ? "default/default-user.png" : $data['image'] ; ?>" alt="imagen" class="thumbnail previsualizar" width="125px" />
                                </div>
                            </div>
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-warning text-white">Guardar cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>