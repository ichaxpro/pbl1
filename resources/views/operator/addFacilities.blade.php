<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Facilities</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/add_facilities.css') }}"/>
</head>
<body>

    <div class="outer-bg">
        <div class="header-logo">
            <img src="{{ asset('images/logo_polinema.png') }}" class="logo" alt="Logo Polinema" />
            <div class="text">
                <p class="title">JURUSAN</p>
                <p class="subtitle1">TEKNOLOGI INFORMASI</p>
                <p class="subtitle2">POLITEKNIK NEGERI MALANG</p>
            </div>
        </div>

        <div class="inner-bg">
            <div class="form-container">
                <h2 class="form-title">Add Facilities</h2>

                 <form action="{{ route('facility.store') }}" method="POST" class="form-box">
                    @csrf
                    <label for="title">URL Image</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Place the URL Image here"></textarea>

                    <div class="btn-group">
                        <button type="button" class="btn cancel" >Cancel</button>
                        <button type="submit" class="btn save" onclick="window.location.href='{{ route('operator.approval_status') }}';" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>