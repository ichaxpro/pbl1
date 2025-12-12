<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Activities</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/add_activities.css') }}"/>
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
                <h2 class="form-title">Add Activities</h2>

                <form action="{{ route('activity.store') }}" method="POST" class="form-box">
                    @csrf
                    <label for="title">URL Image</label>
                    <textarea id="image_url" name="image_url" placeholder="Paste the image URL here"></textarea>

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <div class="btn-group">
                        <a href="{{ route('operator.approval_status') }}" class="btn cancel">
                            Cancel
                        </a>
                        <!-- HAPUS ONCLICK DARI SAVE BUTTON! -->
                        <button type="submit" class="btn save">
                            Save
                        </button>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>