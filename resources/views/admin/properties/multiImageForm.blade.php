@vite(['resources/js/app.js'])
    
    <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-outline w-50 mb-3">
            <label for="path" class="form-label">Seleziona i file da caricare:</label>
            <input type="file" class="form-control" id="path" name="path[]" multiple required>
        </div>

        <div>
            <button type="submit" class="bnt btn-check">Carica</button>
        </div>
    </form>