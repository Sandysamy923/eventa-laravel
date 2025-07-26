<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Event</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow bg-light">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input type="text" name="title" value="{{ $event->title }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Location:</label>
                        <input type="text" name="location" value="{{ $event->location }}" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Event Date:</label>
                        <input type="date" name="event_date" value="{{ $event->event_date }}" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Event Price:</label>
                        <input type="number" name="event_price" value="{{ $event->event_price }}" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" name="image" class="form-control">
                        @if($event->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $event->image) }}" width="100" class="img-thumbnail">
                        </div>
                        @endif
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">Update Event</button>
                    </div>
                </form>
            </div>
        </div>
</div>


</body>
</html>