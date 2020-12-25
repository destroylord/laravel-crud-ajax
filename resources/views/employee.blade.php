<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>

    <section style="padding-top:60px; margin-bottom:50px">
        <div class="container">
            <div class="">
                <h1>Hello world</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                  </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="formEmployee">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" class="form-control" type="number" name="phone">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input id="salary" class="form-control" type="text" name="salary">
            </div>
            <div class="form-group">
                <label for="departement">Departement</label>
                <input id="departement" class="form-control" type="text" name="departement">
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnFormEmployee">Submit</button>
        </div>
      </div>
    </div>
</div>

    {!! $dataTable->scripts() !!}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
      $('#btnFormEmployee').click(function (e) {
        e.preventDefault();
        
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let salary = $('#salary').val();
        let departement = $('#departement').val();
        let _token = $('input[name=_token]').val();

        $.ajax({
          url  : "{{ route('employee.create') }}",
          type : "POST",
          data : {
            name : name,
            email : email,
            phone : phone,
            salary : salary,
            departement : departement,
            _token : _token,
          },
            success : function (response) {
                if (response) {
                  $('#employee-table').prepend(
                    '<tr><td>'
                      + response.name + 
                    '</td><td>'
                      + response.email +
                    '</td><td>'
                      + response.phone +
                    '</td><td>'
                      + response.salary +
                    '</td><td>'
                      + response.departement +
                    '</td></tr>'
                  );
                  $('#formEmployee')[0].reset();
                  $("#exampleModal").modal('hide');
                }else {
                  console.log("tak bisa");
                }
            }
        })
      })
    </script>

  </body>
</html>