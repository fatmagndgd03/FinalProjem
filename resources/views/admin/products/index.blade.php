@extends('admin.layout')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Ürün Listesi</h5>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm"
                style="background-color: #FF6B81; border:none;">
                <i class="lni lni-plus"></i> Yeni Ürün Ekle
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Ürün Adı</th>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                            <th>Stok</th>
                            <th>Durum</th>
                            <th class="text-end pe-4">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        @if($product->fotograf_yolu)
                                            <img src="{{ asset($product->fotograf_yolu) }}" alt=""
                                                style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px;"
                                                class="me-3">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center me-3"
                                                style="width: 40px; height: 40px; border-radius: 5px;">
                                                <i class="lni lni-image text-muted"></i>
                                            </div>
                                        @endif
                                        <span class="fw-bold">{{ $product->ad }}</span>
                                    </div>
                                </td>
                                <td>{{ $product->kategori->ad ?? '-' }}</td>
                                <td>{{ number_format($product->fiyat, 2) }} ₺</td>
                                <td>
                                    @if($product->stok < 10)
                                        <span class="text-danger fw-bold">{{ $product->stok }}</span>
                                    @else
                                        {{ $product->stok }}
                                    @endif
                                </td>
                                <td>
                                    @if($product->aktif_mi)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Pasif</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-sm btn-outline-primary me-1">Düzenle</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">Henüz ürün eklenmemiş.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            {{ $products->links('vendor.pagination.admin-simple') }}
        </div>
    </div>
@endsection