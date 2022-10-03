$(document).ready(function() {

    refreshTaskList()

    function getRetrievedTags(tags) {
        let _tags = JSON.parse(tags)
        let ret = '';
        for (let i = 0; i < _tags.length; i++) {
            ret += '<button type="button">' + _tags[i] + '</button>'
        }
        return ret
    }

    function refreshTaskList() {
        $.ajax({
            url: 'taskGet.php',
            method: 'GET',
            dataType: 'json',
            success:(data) => {

                let retHTML = ''
                for (let i = 0; i < data.length; i++) {
                    let tags = getRetrievedTags(data[i].tag)
                    retHTML += '<tr id="taskItem_' + data[i].id + '">' +
                        '<td class="col0">' + data[i].description + '</td>' +
                        '<td class="col1">' + tags + '</td>' +
                        '<td class="col2"><button type="button" name="delete" id="' + data[i].id + '">Borrar</button><td>' +
                        '</tr>'
                }
                $('#tasklist').append(retHTML)
            }, error(reason) {
                alert(reason)
            }
        });
    }

    function clearList() {
        $('#tasklist').html('<tr>' +
            '<th class="col0">Tarea</th>' +
            '<th class="col1">Categorías</th>' +
            '<th class="col2">Acciones</th>' +
            '</tr>')
    }

    $(document).on('click', '[name=delete]', function() {
        let taskId = $(this).attr('id')
        $.ajax({
            url: 'taskDelete.php',
            method: 'POST',
            data: {id: taskId},
            success:() => {
                clearList()
                refreshTaskList()
            }
        })
    });

    $(document).on('submit', '#formsection', function(event) {
        event.preventDefault()

        let title = $('#title').val()
        let tags = [];
        $("input:checkbox[name=tag]:checked").each(function() {
            tags.push($(this).val())
        })
        if(title === '') {
            alert('El campo descripción no puede ser vacío.')
        } else if (tags.length === 0) {
            alert('La categoría no puede ser vacía.')
        } else {
            $('#submit').attr('disabled', 'disabled')
            $.ajax({
                url: 'taskSet.php',
                method: 'POST',
                data: {'description': title, 'tag': tags},
                success:(data) => {
                    $('#submit').attr('disabled', false)
                    $('#formsection')[0].reset()
                    $('.listsection').prepend(data)
                    clearList()
                    refreshTaskList()
                },
                error:() => {
                    alert('No se ha podido añadir la tarea a la Base de Datos.')
                    $('#submit').attr('disabled', false);
                }
            })
        }
    });
});