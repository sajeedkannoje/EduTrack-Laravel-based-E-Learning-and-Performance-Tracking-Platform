{{-- <div>
    <form action="{{ route('posts.update',['post'=>" $post->id"]) }}" method="POST" id='form'
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" >Edit Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title',$post->title) }}">

            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" >Edit Discription</label>
            <textarea name="description" class="form-control" cols="4" rows="4"
                id="description">{{ old('description',$post->description) }}</textarea>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status" >Edit post status</label>
            <select class="form-control" name="status" id="status">

                @foreach (config('setting.post_status') as $status=>$value)
                <option value="{{ $status }}" {{ old('status',$post->status)==$status ? 'selected' : '' }}>
                    {{ Str::ucfirst($value) }}
                </option>
                @endforeach

            </select>

            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="keywords" >Select Keyword for your post.</label>        
            <select class="form-control" name="keywords[]" multiple id="keywords">
                @foreach ($keywords as $keyword)
                    <option 
                    value="{{ $keyword->id }}"
                    {{ in_array(old('keywords',$keyword->id),$postKeywords) ? 'selected' : '' }}>
                        {{ $keyword->name }}
                    </option>
                @endforeach
            </select>
            <small><strong>Note:</strong>You are free to select multiple keywords maximum 4 </small>
                    
            @error('keywords')
                <span class="text-danger">{{ $message }}</span>    
            @enderror    
        </div>

        <div class="form-group">
            <img src="{{ $post->postImage() }}" alt="current image" height="100%" width="100%">
        </div>

        <div class="form-group">
            <label for="image" class="h6 ">Select image </label>
            <input type="file" name="image" id="image" class="form-control">

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button id="submit" class="btn btn-primary">Edit Post</button>

    </form>
</div>
</div> --}}