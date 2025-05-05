<div class="table-responsive">
        
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th class="text-center"># / Service ID</th>
                <th class="text-center">Image</th>
                <th class="text-center">Title</th>
                <th class="text-center">Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($services) == 0)
            <tr>
                <td colspan="5" class="text-center">No Services Found</td>
            </tr>
            @else
                @foreach ($services as $service)
                <tr>
                    <th>{{ $service->id }} / {{ $service->service_id }}</th>
                    <td><img src="{{ asset($service->img) }}" alt="{{ $service->title }}" width="100"></td>
                    <td>{{ $service->title }}</td>
                    <td>{!! $service->description !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $service->id }}">Edit</button>
                        <a href="{{ route('service.destroy', $service->id) }}" class="btn btn-danger waves-effect waves-light mt-1">Delete</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>