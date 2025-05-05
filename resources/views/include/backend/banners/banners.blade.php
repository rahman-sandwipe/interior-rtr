<div class="table-responsive">
        
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th class="text-center"># / banner ID</th>
                <th class="text-center">Image</th>
                <th class="text-center">Title</th>
                <th class="text-center">Sub Title</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($banners) > 0)
                @foreach ($banners as $banner)
                <tr>
                    <th>{{ $banner->id }} / {{ $banner->bannerID }}</th>
                    <td><img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" width="100"></td>
                    <td>{{ $banner->title }}</td>
                    <td>{!! $banner->subtitle !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $banner->id }}">Edit</button>
                        <a href="{{ route('banner.destroy', $banner->id) }}" class="btn btn-danger waves-effect waves-light mt-1">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">No banners found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>