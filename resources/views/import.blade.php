<form action="/import" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".xlsx, .xls">
    <button type="submit">Upload Excel File</button>
</form>
