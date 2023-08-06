<div>
    <div>
        <form action="{{ route('posts.store') }}" id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title"  >Enter title for your post.</label>

                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title for the post"  value="{{ old('title') }}">
                <small class="form-text text-muted">Title for the post must be unique.</small>
                    
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">

                <label for="description" >Enter discription for your post.</label>        
                <textarea name="description" class="form-control" id="description"  >{{ old('description') }}</textarea>
        
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" >Select status for your post.</label>        
                <select class="form-control" name="status" id="status">
                    @foreach (config('setting.post_status') as $status=>$value)
                        <option value="{{ $status }}" {{ old('status')==$status ? 'selected' : '' }}>{{ Str::ucfirst($value) }}</option>                                
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
                        <option value="{{ $keyword->id }}">
                            {{ $keyword->name }}
                        </option>
                    @endforeach
                </select>
                <small><strong>Note:</strong>You are free to select multiple keywords maximum 4 or <a href="">add new.</a> </small>
                        
                @error('keywords')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror    
            </div>

            <div class="form-group">        
                <label for="image">Select image for your post.</label>        
                <input type="file" name="image" id="image" class="form-control">        
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror        
            </div>
                
            <button class="btn btn-success" id="submit">Create Post</button>
                
        </form>      
      </div>
</div>
