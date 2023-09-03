<form action="{{ route('owner.import') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="file" name="csv_file">
  <button type="submit">インポート</button>
</form>
