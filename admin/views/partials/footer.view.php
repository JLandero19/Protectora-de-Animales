    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    

    <script src="https://kit.fontawesome.com/91ac8498c2.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= RouteController::ctrlRoute() ?>views/dist/js/adminlte.min.js"></script>

    <!-- Datatables -->
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- FullCalendar -->
    <script src="<?= RouteController::ctrlRoute() ?>views/js/fullcalendar/index.global.min.js"></script>
    <script src='<?= RouteController::ctrlRoute() ?>views/js/fullcalendar/locales/es.global.js'></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/js/bootstrap-clockpicker.js"></script>
    <script src="<?= RouteController::ctrlRoute() ?>views/js/moment-with-locales.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= RouteController::ctrlRoute() ?>views/plugins/chart.js/Chart.min.js"></script>

    <!-- Custom -->
    <script src="views/js/template.js"></script>
    <script src="views/js/graph.js"></script>
    <script src="views/js/usuarios.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            
            //Initialize Select2 Elements
            $('.select2').select2({
                maximumSelectionLength: 3
            });

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                maximumSelectionLength: 3,
                theme: 'bootstrap4'
            });

            $("#btnAddTag").click(function () {
                addTag();             
            });
            
        });

        function addTag() {           
            $.ajax({
                type: "POST",
                url: "views/actions/add-tag.php",
                data: { name: $("#name_tag").val() },
                success: function(msg) {
                    document.getElementById('tag_id').innerHTML = "";
                    for (let key in msg.tags) {
                        if ($("#name_tag").val() == msg.tags[key].name) {
                            document.getElementById('tag_id').innerHTML += "<option value='" + msg.tags[key].id + "' selected>" + msg.tags[key].name + "</option>";
                        } else {
                            document.getElementById('tag_id').innerHTML += "<option value='" + msg.tags[key].id + "'>" + msg.tags[key].name + "</option>";
                        }
                        
                    }
                    // alert(msg.message);
                    document.getElementById("name_tag").value = "";          
                },
                error: function(error) {
                    alert("Ha habido un error al crear una nueva etiqueta.");
                }
            });
        }

        // FULL CALENDAR
        document.addEventListener("DOMContentLoaded", function() {

            $('.clockpicker').clockpicker();

            var calendarWeb = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarWeb, {
                // initialDate: '2023-01-12',
                height: 750,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                editable: true,
                droppable: true,
                // dayMaxEvents: true, // allow "more" link when too many events
                events: "views/fullcalendar/actions/list-activities.php",
                locale: 'es',
                dateClick: function(info) {
                    // alert(info.dateStr);
                    CleanForm();
                    $("#btn-add").show();
                    $("#btn-delete").hide();
                    $("#btn-edit").hide();

                    if (info.allDay) {
                        $("#startDate").val(info.dateStr);
                        $("#endDate").val(info.dateStr);
                    } else {
                        let dateTime = info.dateStr.split("T");
                        
                        $("#startDate").val(dateTime[0]);
                        $("#endDate").val(dateTime[0]);

                        $("#startTime").val(dateTime[1].substring(0,5));

                        let endTime = dateTime[1].substring(0,5);
                        endTime = endTime.split(":");
                        let result = parseInt(endTime[0]) + 1;
                        result = String(result) + ":00";
                        $("#endTime").val(result);
                    }                    

                    $("#formEvents").modal("show");
                },
                eventClick: function(info) {
                    // alert("Has hecho click en un evento!");

                    $("#btn-add").hide();
                    $("#btn-delete").show();
                    $("#btn-edit").show();

                    $("#id").val(info.event.id);
                    $("#title").val(info.event.extendedProps.who_request);
                    $("#activityCategory").val(info.event.extendedProps.activity_category_id);
                    
                    // extendedProps ayuda a ver todos los elementos dentro de un JSON si lo pones tienes acceso a todo
                    // alert(info.event.extendedProps.activity_category_id);
                    // console.log(JSON.stringify(info.event));

                    $("#startDate").val(moment(info.event.start).format("YYYY-MM-DD"));
                    $("#startTime").val(moment(info.event.start).format("HH:mm:ss"));

                    $("#endDate").val(moment(info.event.end).format("YYYY-MM-DD"));
                    $("#endTime").val(moment(info.event.end).format("HH:mm:ss"));

                    $("#formEvents").modal("show");
                },
                eventResize: function(info) {
                    $("#id").val(info.event.id);
                    $("#title").val(info.event.extendedProps.who_request);
                    $("#activityCategory").val(info.event.extendedProps.activity_category_id);
                    
                    // extendedProps ayuda a ver todos los elementos dentro de un JSON si lo pones tienes acceso a todo
                    // alert(info.event.extendedProps.activity_category_id);
                    // console.log(JSON.stringify(info.event));

                    $("#startDate").val(moment(info.event.start).format("YYYY-MM-DD"));
                    $("#startTime").val(moment(info.event.start).format("HH:mm:ss"));

                    $("#endDate").val(moment(info.event.end).format("YYYY-MM-DD"));
                    $("#endTime").val(moment(info.event.end).format("HH:mm:ss"));

                    let register = {
                        id: $("#id").val(),
                        title: $("#title").val(),
                        activityCategory: $("#activityCategory").val(),
                        start: $("#startDate").val() + " " + $("#startTime").val(),
                        end: $("#endDate").val() + " " + $("#endTime").val()
                    }

                    editRegister(register);
                },
                eventDrop: function(info) {
                    $("#id").val(info.event.id);
                    $("#title").val(info.event.extendedProps.who_request);
                    $("#activityCategory").val(info.event.extendedProps.activity_category_id);
                    
                    // extendedProps ayuda a ver todos los elementos dentro de un JSON si lo pones tienes acceso a todo
                    // alert(info.event.extendedProps.activity_category_id);
                    // console.log(JSON.stringify(info.event));

                    $("#startDate").val(moment(info.event.start).format("YYYY-MM-DD"));
                    $("#startTime").val(moment(info.event.start).format("HH:mm:ss"));

                    $("#endDate").val(moment(info.event.end).format("YYYY-MM-DD"));
                    $("#endTime").val(moment(info.event.end).format("HH:mm:ss"));

                    let register = {
                        id: $("#id").val(),
                        title: $("#title").val(),
                        activityCategory: $("#activityCategory").val(),
                        start: $("#startDate").val() + " " + $("#startTime").val(),
                        end: $("#endDate").val() + " " + $("#endTime").val()
                    }

                    editRegister(register);
                }
            });

            calendar.render();

            // Eventos de los botones
            $("#btn-add").click(function () {
                ResetMessage();
                let data = recoverFormData();
                let register = validateFormData(data);
                if (register != false) {
                    addRegister(register);
                    $("#formEvents").modal("hide");
                }
            });

            $("#btn-edit").click(function () {
                ResetMessage();
                let data = {
                    id: $("#id").val(),
                    title: $("#title").val(),
                    activityCategory: $("#activityCategory").val(),
                    start: $("#startDate").val() + " " + $("#startTime").val(),
                    end: $("#endDate").val() + " " + $("#endTime").val()
                }
                let register = validateFormData(data);
                if (register != false) {
                    editRegister(register);
                    $("#formEvents").modal("hide");
                }
                
            });

            $("#btn-delete").click(function () {
                let register = {
                    id: $("#id").val()
                }
                // alert(register.id);
                deleteRegister(register);
                $("#formEvents").modal("hide");
                
            });

            // Funciones que interactuan con el Server Ajax
            function addRegister(register) {
                $.ajax({
                    type: "POST",
                    url: "views/fullcalendar/actions/add-activity.php",
                    data: register,
                    success: function(msg) {
                        calendar.refetchEvents();
                        $("#message_actions").html("");
                        $("#message_actions").html(msg.message);
                    },
                    error: function(error) {
                        alert("Ha habido un error al intentar añadir una actividad: " + error);
                    }
                });            
            }

            // Funciones que interactuan con el Server Ajax
            function editRegister(register) {
                // alert(JSON.stringify(register));
                $.ajax({
                    type: "POST",
                    url: "views/fullcalendar/actions/edit-activity.php",
                    data: register,
                    success: function(msg) {
                        calendar.refetchEvents();
                        $("#message_actions").html("");
                        $("#message_actions").html(msg.message);
                    },
                    error: function(error) {
                        alert("Ha habido un error al intentar editar una actividad: " + error);
                    }
                });            
            }

            // Funciones que interactuan con el Server Ajax
            function deleteRegister(register) {
                // alert(JSON.stringify(register));
                $.ajax({
                    type: "POST",
                    url: "views/fullcalendar/actions/delete-activity.php",
                    data: register,
                    success: function(msg) {
                        calendar.refetchEvents();
                        $("#message_actions").html("");
                        $("#message_actions").html(msg.message);
                    },
                    error: function(error) {
                        alert("Ha habido un error al intentar eliminar una actividad: " + error);
                    }
                });            
            }

            // Funciones que interactuan con el formEvents
            function CleanForm() {
                $("#title").val('');
                $("#activityCategory").val($("#activityCategory").children('option:first').val());
                $("#startDate").val('');
                $("#startTime").val('');
                $("#endDate").val('');
                $("#endTime").val('');
            }

            function ResetMessage() {
                $("#messageTitle").text('');
                $("#messageActivityCategory").text();
                $("#messageStartDate").text('');
                $("#messageEndDate").text('');
            }

            function recoverFormData() {
                let register = {
                    title: $("#title").val(),
                    activityCategory: $("#activityCategory").val(),
                    start: $("#startDate").val() + " " + $("#startTime").val(),
                    end: $("#endDate").val() + " " + $("#endTime").val()
                }

                return register;
                // alert($("#activityCategory").val() + $("#startDate").val() + " " + $("#startDate").val() + " - " + $("#endDate").val() + " " + $("#endDate").val());
            }

            function validateFormData(data) {
                var message = "";
                if (!isNaN(data.title) || data.title == "" || data.title == null) {
                    $("#messageTitle").text('El titulo introducido no es válido.');
                    return false;
                }

                if (data.activityCategory == "" || data.activityCategory == null) {
                    $("#messageActivityCategory").text('La actividad introducida no es válida.');
                    return false;
                }

                if (data.start == "" || data.start == null) {
                    let result = moment(data.start, 'YYYY-MM-DD HH:mm:ss', true).isValid();

                    if (!result) {
                        $("#messageStartDate").text('El fecha introducida no es válida.');
                    }

                    return false;
                }

                if (data.end == "" || data.end == null) {
                    let result = moment(data.end, 'YYYY-MM-DD HH:mm:ss', true).isValid();

                    if (!result) {
                        $("#messageEndDate").text('El fecha introducida no es válida.');
                    }

                    return false;
                }

                let dateStart = new Date(data.start);
                let dateEnd = new Date(data.end);

                if (dateStart >= dateEnd) {
                    $("#messageStartDate").text('La fecha de inicio no puede ser igual o mayor que la fecha de fin.');

                    return false;
                }

                return data;
            }        
        });
        // END FULL CALENDAR        
    </script>
    
</body>
</html>