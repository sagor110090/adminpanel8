<div>
    @include('livewire.loading-indicator')

    <form accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search..."
                value="{{ request('search') }}">
        </div>
    </form>

    <br />
    <br />
    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th width='30'>#</th>
                    @foreach ($fields as $item)
                    <th>
                        {{ Str::ucfirst(str_replace("_"," ",$item)) }}
                    </th>
                    @endforeach
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @foreach ($fields as $field)
                    <td>
                        {{ $item->$field }}
                    </td>
                    @endforeach
                <td>
                    @if (in_array('show',$actionLink))
                    <a href="{{ url($path .'/'. $item->id) }}" title="View"><button class="btn btn-info btn-sm"><i
                                class="fa fa-eye"></i></button></a>
                    @endif
                    @if (in_array('edit',$actionLink))
                    <a href="{{ url($path .'/'. $item->id . '/edit') }}" title="Edit"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                        </button></a>
                    @endif
                    @if (in_array('delete',$actionLink))
                    <form method="POST" id="deleteButton{{$item->id}}" action="{{ url($path. '/' . $item->id) }}"
                        accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                            onclick="sweetalertDelete({{$item->id}})"><i class="fa fa-trash"></i></button>
                    </form>
                    @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $data->appends(['search' => Request::get('search')])->render() !!}
        </div>
    </div>
</div>
