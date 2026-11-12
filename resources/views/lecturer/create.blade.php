<x-app>

    <x-slot:title>{{ $title }}</x-slot>



    <form method="POST" action="{{ route('lecturer.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name"value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Upload Avatar</label>
            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="upload"
                name="avatar">
            @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <img src="{{ asset('images/no-profil.png.jpg') }}"alt="" class="w-25 rounded mt-2" id="preview">

        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>

            <select class="form-select @error('department_id') is-invalid @enderror" name="department_id"
                id="department_id">

                <option value>-- choose department --</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>


            @error('departmen_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <a class="btn btn-warning" href="{{ route('lecturer.index') }}" role="button">back </a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-app>
