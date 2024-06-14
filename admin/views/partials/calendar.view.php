<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendario de actividades</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Calendario de actividades</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row d-flex justify-content-center m-2">
                <!-- Default box -->
            <div class="card col-md-10">
                <div class="card-body row">
                    <!-- Calendario -->
                    <div class="col-12" id="message_actions"></div>
                    <div class="col-12" id="calendar"></div>
                    
                    <!-- Modal para agregar actividades -->
                    <div class="modal fade" id="formEvents" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actividad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" id="id" />
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label>Solicitante</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="title" value="" />
                                                </div>
                                                <div class="error" id="messageTitle"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label>Actividad</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="activityCategory">
                                                        <?php
                                                        foreach ($activities_categories as $data) {
                                                        ?>
                                                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="error" id="messageActivityCategory"></div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Fecha inicio</label>
                                                <div class="input-group" data-autoclose="true">
                                                    <input type="date" class="form-control date-input" id="startDate" value="" />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Hora inicio</label>
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                    <input type="text" class="form-control date-input" id="startTime" value="" />
                                                </div>
                                            </div>
                                            <div class="error col-12" id="messageStartDate"></div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Fecha fin</label>
                                                <div class="input-group" data-autoclose="true">
                                                    <input type="date" class="form-control" id="endDate" value="" />
                                                </div>
                                                
                                            </div>
                                            <div class="form-group col-md-6" id="endTime2">
                                                <label>Hora fin</label>
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                    <input type="text" class="form-control" id="endTime" value="" />
                                                </div>
                                            </div>
                                            <div class="error col-12" id="messageEndDate"></div>
                                        </div>                                
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn-add" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Agregar</button>
                                    <button type="button" id="btn-edit" class="btn btn-warning text-white btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                    <button type="button" id="btn-delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa-solid fa-right-from-bracket"></i> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </section>
</div>