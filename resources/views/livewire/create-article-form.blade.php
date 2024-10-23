<form class="bg-body-tertiary shadow rounded p-5 my-5">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" wire:model="title">
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione:</label>
        <textarea class="form-control" id="description" @error('description') is-invalid @enderror cols="30" rows="10" wire:model="description"></textarea>
        @error('description')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo:</label> <input type="text" @error('price') is-invalid @enderror class="form-control" id="price" wire:model="price">
        @error('price')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <select class="form-control" id="category" @error('category') is-invalid @enderror wire:model="category">
            <option label disabled>Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Crea</button>
    </div>
</form>
