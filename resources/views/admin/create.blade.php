<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an event</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    

<div class="container mt-5">
    <h1 class="text-center mb-4">Create Event</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location:</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Event Date:</label>
                    <input type="date" name="event_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="number" name="event_price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>