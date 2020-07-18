<div class="form-group">
	<label>Nama Kategori</label>
	<input type="text" value="{{ $data->nama }}" class="form-control" disabled="disabled">
</div>
<div class="form-group">
	<label>Slug Link</label>
	<input type="text" value="{{ $data->slug }}" class="form-control" disabled="disabled">
</div>
<div class="form-group">
	<label>Diskripsi</label>
	<textarea class="form-control none" disabled="disabled">{{ $data->deskripsi }}</textarea>
</div>