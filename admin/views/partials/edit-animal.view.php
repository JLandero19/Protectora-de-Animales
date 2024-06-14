<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Animal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="animal">Animales</a></li>
                        <li class="breadcrumb-item active">Editar Animal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-white">Editar Animal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="edit-animal" enctype="multipart/form-data">
                        <input type="hidden" name="animal_id" id="animal_id" value="<?= $data['id'] ?>" />
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del animal" value="<?= $data['name'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="chip">Chip</label>
                                <input type="number" class="form-control" step="1" name="chip" id="chip" min="111111111111111" value="<?= $data['chip'] ?>" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="999999999999999" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="race">Raza</label>
                                <input type="text" class="form-control" name="race" id="race" placeholder="Raza del animal" value="<?= $data['race'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descripcion del animal" required><?= $data['description'] ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" step="1" min="1" name="age" id="age" placeholder="5" value="<?= $data['age'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="sex">Sexo</label>
                                <select class="form-control" name="sex" id="sex">
                                    <option value="">Seleccione una sexo</option>
                                    <option value="Macho" <?php echo $data['sex'] == "Macho" ? "selected" : ""; ?>>Macho</option>
                                    <option value="Hembra" <?php echo $data['sex'] == "Hembra" ? "selected" : ""; ?>>Hembra</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="specie_id">Especie</label>
                                <select class="form-control" name="specie_id" id="specie_id">
                                    <option value="">Seleccione una especie</option>
                                    <?php
                                    foreach ($select_specie as $value) {
                                    ?>
                                        <option value="<?= $value['id'] ?>" <?php echo $value['id'] == $data['specie_id'] ? "selected" : ""; ?>><?= $value['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="panel">Imagen (1280 x 853 pixeles)</div>
                                <input type="file" class="nuevaFoto" name="image" id="image" />
                                <p class="help-block1">Peso máximo de la foto 2MB.</p>
                                <img src="../views/images/animals/<?php echo $data['image'] != null ? $data['image'] : "default/default-animal.png"; ?>" alt="imagen" class="thumbnail previsualizar" width="125px" />
                            </div>
                            
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-warning text-white">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>