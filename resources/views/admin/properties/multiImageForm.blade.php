    <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="path">Seleziona i file da caricare:</label>
            <input type="file" id="path" name="path[]" multiple required>
        </div>

        <div>
            <button type="submit">Carica</button>
        </div>
    </form>