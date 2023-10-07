@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ ADMIN_REVIEWS }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>{{ LISTING_FEATURED_PHOTO }}</th>
                        <th>{{ LISTING_NAME }}</th>
                        <th>{{ MY_REVIEW }}</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach($all_listing_items as $row)

                            <!-- Skip if this is admin's item -->
                            @if(in_array($row->id,$arr_own_item_ids))
                                @continue
                            @endif

                            @php $i++; @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/listing_featured_photos/'.$row->listing_featured_photo) }}" alt="" class="w_150">
                                </td>
                                <td>
                                    {{ $row->listing_name }} <br>
                                    <a href="{{ route('front_listing_detail',$row->listing_slug) }}" class="badge badge-success" target="_blank">{{ SEE_DETAIL }}</a>
                                </td>
                                <td>
                                    @php
                                        $item_rating = 0;
                                        $item_review = '';
                                        $item_id = 0;
                                        $review_for_this = \App\Models\Review::where('listing_id',$row->id)->where('agent_type','Admin')->where('agent_id',$user_detail->id)->first();
                                        if($review_for_this != null) {
                                            $item_rating = $review_for_this->rating;
                                            $item_review = $review_for_this->review;
                                            $item_id = $review_for_this->id;
                                        }
                                    @endphp
                                    @if($item_rating != 0)
                                        <div class="my-review">
                                            @if($item_rating == 5)
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            @elseif($item_rating == 4)
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif($item_rating == 3)
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif($item_rating == 2)
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif($item_rating == 1)
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @endif
                                        </div>
                                    @endif

                                    @if($item_rating == 0)
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_review_modal{{ $i }}"><i class="fa fa-plus"></i> {{ ADD_REVIEW }}</a>
                                    @endif

                                </td>

                                <td>
                                    @if($item_rating != 0)
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_review_modal{{ $i }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_delete_admin_review',$item_id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>


                            <!-- Add Modal -->
                            <div class="modal fade modal_listing_detail" id="add_review_modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ ADD_REVIEW }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin_store_admin_review') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="listing_id" value="{{ $row->id }}">
                                                <div class="form-group">
                                                    <label for="">{{ SELECTED_ITEM }}</label>
                                                    <div>
                                                        {{ $row->listing_name }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{RATING }}</label>
                                                    <div>
                                                        <select name="rating" class="form-control">
                                                            @for($j=1;$j<=5;$j++)
                                                                <option value="{{ $j }}">{{ $j }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ REVIEW }}</label>
                                                    <div>
                                                        <textarea name="review" class="form-control h_100" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Add Modal -->



                            <!-- Update Modal -->
                            <div class="modal fade modal_listing_detail" id="update_review_modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ UPDATE_REVIEW }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin_update_admin_review',$item_id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="listing_id" value="{{ $row->id }}">
                                                <div class="form-group">
                                                    <label for="">{{ SELECTED_ITEM }}</label>
                                                    <div>
                                                        {{ $row->listing_name }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ RATING }}</label>
                                                    <div>
                                                        <select name="rating" class="form-control">
                                                            @for($j=1;$j<=5;$j++)
                                                                <option value="{{ $j }}" @if($j == $item_rating) selected @endif>{{ $j }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ REVIEW }}</label>
                                                    <div>
                                                        <textarea name="review" class="form-control h_100" cols="30" rows="10">{{ $item_review }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Update Modal -->



                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
