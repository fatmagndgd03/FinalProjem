@extends('admin.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Yeni Ürün Ekle</h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Ürün Adı</label>
                            <input type="text" name="ad" class="form-control" value="{{ old('ad') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori_id" class="form-select" required>
                                    <option value="">Seçiniz</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->ad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fiyat (₺)</label>
                                <input type="number" step="0.01" name="fiyat" class="form-control"
                                    value="{{ old('fiyat') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stok Adedi</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fotoğraf</label>
                                <input type="file" name="fotograf" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Açıklama</label>
                            <textarea name="aciklama" class="form-control" rows="4"
                                required>{{ old('aciklama') }}</textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="aktif_mi" class="form-check-input" id="aktifCheck" checked>
                            <label class="form-check-label" for="aktifCheck">Ürün satışa açık olsun</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light me-2">İptal</a>
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #FF6B81; border:none;">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection