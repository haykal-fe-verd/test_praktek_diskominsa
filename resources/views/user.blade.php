<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <title>Pretest Kominsa Aceh 2025</title>
</head>

<body>
    @if (session('success'))
        <div class="bg-green-500 text-white p-5">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col w-full p-10 min-h-screen items-center justify-center bg-gray-50">
        <h1 class="font-bold text-2xl">Selamat datang di Pretest Diskominsa</h1>
        <p>Silahkan daftar untuk melanjutkan</p>

        <div class="mt-10 w-full">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
                        @if ($errors->has('nama'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('nama') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('nik') }}" placeholder="Masukkan NIK">
                        @if ($errors->has('nik'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('nik') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('tanggal_lahir') }}" placeholder="Pilih tanggal lahir">
                        @if ($errors->has('tanggal_lahir'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('tanggal_lahir') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir">
                        @if ($errors->has('tempat_lahir'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('tempat_lahir') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full">
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @if ($errors->has('jenis_kelamin'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('jenis_kelamin') }}</p>
                        @endif
                    </div>

                    {{-- dropdown --}}
                    <div class="flex flex-col">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full">
                            <option value="" disabled selected>Pilih provinsi</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->name }}" @if (old('provinsi') == $item->name) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('provinsi'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('provinsi') }}</p>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        <label for="kabupaten">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full">
                            <option value="" disabled selected>Pilih kabupaten</option>
                            @foreach ($kabupaten as $item)
                                <option value="{{ $item->name }}" @if (old('kabupaten') == $item->name) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kabupaten'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('kabupaten') }}</p>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        <label for="kecamatan">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full">
                            <option value="" disabled selected>Pilih kecamatan</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->name }}" @if (old('kecamatan') == $item->name) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kecamatan'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('kecamatan') }}</p>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        <label for="desa">Desa</label>
                        <select name="desa" id="desa"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full">
                            <option value="" disabled selected>Pilih desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->name }}" @if (old('desa') == $item->name) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('desa'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('desa') }}</p>
                        @endif
                    </div>

                    {{-- email --}}
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('email') }}" placeholder="Masukkan email">
                        @if ($errors->has('email'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('password') }}" placeholder="Masukkan password">
                        @if ($errors->has('password'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                            value="{{ old('password_confirmation') }}" placeholder="Konfirmasi password">
                        @if ($errors->has('password_confirmation'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                </div>

                <div>
                    <img src="{{ captcha_src() }}" alt="captcha">
                    <div class="mt-2"></div>
                    <input type="text" name="captcha"
                        class="border border-slate-900 w-full h-9 rounded-md px-3 w-full"
                        placeholder="Please Insert Captch">
                    @error('captcha')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-slate-900 mt-5 w-fit h-9 rounded-md text-white px-3 py-2 flex items-center justify-center">
                    Daftar
                </button>
            </form>
        </div>
    </div>

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#provinsi').select2({
                placeholder: "Pilih Provinsi",
                allowClear: true
            });
            $('#kabupaten').select2({
                placeholder: "Pilih Kabupaten",
                allowClear: true
            });
            $('#kecamatan').select2({
                placeholder: "Pilih Kecamatan",
                allowClear: true
            });
            $('#desa').select2({
                placeholder: "Pilih Desa",
                allowClear: true
            });
        });
    </script>
</body>

</html>
