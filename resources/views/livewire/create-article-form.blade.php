<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit="save">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" wire:model.blur="title">
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione:</label>
        <textarea class="form-control" id="description" @error('description') is-invalid @enderror cols="30" rows="10" wire:model.blur="description"></textarea>
        @error('description')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo:</label> <input type="text" @error('price') is-invalid @enderror class="form-control" id="price" wire:model.blue="price">
        @error('price')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <select class="form-control" id="category" @error('category') is-invalid @enderror wire:model.blur="category">
            <option label disabled>Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <input type="file" wire:model.live="temporary_images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
        @error('temporary_images.*')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
        @error('temporary_images')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Photo preview:</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}})"></div>
                        </div>
                        <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Crea</button>
    </div>
</form>
