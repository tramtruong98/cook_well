<form action="/import" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="file">
        <div class="btn sbold green"> Add
            <i class="fa fa-plus"></i>
        </div>
    </label>
    <input id="file" type="file" name="file" class="hidden" accept=".xlsx, .xls, .csv, .ods">
    <button type="submit">Import</button>
</form>