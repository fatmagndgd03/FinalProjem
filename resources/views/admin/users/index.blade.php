@extends('admin.layout')

@section('title', 'Yönetici Yönetimi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Yönetici Yönetimi</h5>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <!-- Current Admins List -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Mevcut Yöneticiler ({{ $admins->count() }}/3)</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="p-3">Ad Soyad</th>
                                <th class="p-3">E-posta</th>
                                <th class="p-3">Kayıt Tarihi</th>
                                <th class="p-3 text-end">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="p-3 align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center me-3"
                                                style="width: 40px; height: 40px; font-weight: bold;">
                                                {{ strtoupper(substr($admin->name, 0, 1)) }}
                                            </div>
                                            {{ $admin->name }}
                                            @if($admin->id === auth()->id())
                                                <span class="badge bg-success ms-2" style="font-size: 10px;">Siz</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-3 align-middle">{{ $admin->email }}</td>
                                    <td class="p-3 align-middle">{{ $admin->created_at->format('d.m.Y') }}</td>
                                    <td class="p-3 align-middle text-end">
                                        @if($admin->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST"
                                                onsubmit="return confirm('Bu kişinin yöneticilik yetkisini almak istediğinize emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Yetkiyi Al</button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-light" disabled>Kaldırılamaz</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add New Admin Form -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Yeni Yönetici Ekle</h5>
                </div>
                <div class="card-body">
                    @if($admins->count() < 3)
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Kullanıcı E-posta Adresi</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="admin@ornek.com"
                                    required>
                                <div class="form-text">Yönetici yapmak istediğiniz kişinin sisteme kayıtlı e-posta adresini
                                    girin.</div>
                                @error('email')
                                    <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100"
                                style="background-color: #FF6B81; border: none;">
                                <i class="lni lni-plus"></i> Yönetici Ekle
                            </button>
                        </form>
                    @else
                        <div class="alert alert-warning mb-0">
                            <i class="lni lni-warning"></i> Maksimum yönetici sayısına (3) ulaştınız.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection