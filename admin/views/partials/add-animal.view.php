<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo Animal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="animals">Animales</a></li>
                        <li class="breadcrumb-item active">Nuevo Animal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nuevo Animal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="add-animal" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="create" id="create" value="create" /> -->
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del animal" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="chip">Chip</label>
                                <input type="number" class="form-control" step="1" name="chip" id="chip" min="111111111111111" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="999999999999999" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="race">Raza</label>
                                <input type="text" class="form-control" name="race" id="race" placeholder="Raza del animal" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descripcion del animal" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" step="1" min="1" name="age" id="age" placeholder="5" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="sex">Sexo</label>
                                <select class="form-control" name="sex" id="sex">
                                    <option value="">Seleccione una sexo</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="specie_id">Especie</label>
                                <select class="form-control" name="specie_id" id="specie_id">
                                    <option value="">Seleccione una especie</option>
                                    <?php
                                    foreach ($select_specie as $value) {
                                    ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="panel">Imagen (1280 x 853 pixeles)</div>
                                <input type="file" class="nuevaFoto" name="image" id="image" />
                                <p class="help-block1">Peso máximo de la foto 2MB.</p>
                                <img src="../views/images/animals/default/default-animal.png" alt="imagen" class="thumbnail previsualizar" width="125px" />
                            </div>
                            
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar Animal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>