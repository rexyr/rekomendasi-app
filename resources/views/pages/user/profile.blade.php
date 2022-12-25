@extends('layouts.guest')

@section('content')
    <div class="profile-area">
        <div class="profile-side-bar">
            <div id="profileSection" onclick="showProfile()" class="profile-option selected-profile-option">
                Profile
            </div>
            <div id="activitySection" onclick="showActivities()" class="profile-option">
                Activities
            </div>
        </div>

        <div class="profile-main-container">
            <div id="profileMenu" class="profile-menu-container active-profile-menu">
                <div class="profile-menu-header">
                    <h2>Profile</h2>
                </div>
                <div class="profile-menu-content">
                    <div class="profile-picture-area">
                        <img src="{{ asset(auth()->user()->profile_picture != null ? auth()->user()->profile_picture : 'images/ProfilePictures/user.png') }}"
                            alt="">
                    </div>
                    <div class="profile-information-area">
                        <div class="profile-information-row">
                            <h5>Name</h5>
                            <h2>{{ auth()->user()->name }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Username</h5>
                            <h2>{{ auth()->user()->username }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Email</h5>
                            <h2>{{ auth()->user()->email }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Phone</h5>
                            <h2>{{ auth()->user()->phone }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div id="activityMenu" class="profile-menu-container">
                <div class="profile-menu-header">
                    <h2>Activities</h2>
                </div>
                <div class="activities-menu-content">
                    <table class="meja">
                        <thead>
                            <tr>
                                <th width="4%">No</th>
                                <th width="11%">Date</th>
                                <th width="8%">Time</th>
                                <th width="20%">Barbershop</th>
                                <th width="15%">Capster</th>
                                <th width="12%">Status</th>
                                <th width="10%">Rating</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->order_date->format('d-m-Y') }}</td>
                                    <td>{{ $order->order_time->format('H:i') }}</td>
                                    <td>{{ $order->barber->name }}</td>
                                    <td>{{ $order->capster->name }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(0) <div class="status waiting"> </div> @break
                                            @case(1) <div class="status approved"></div> @break
                                            @case(2) <div class="status finished"></div> @break
                                            @case(3) <div class="status canceled"></div> @break
                                            @case(4) <div class="status rejected"></div> @break
                                            @case(5) <div class="status reviewed"></div> @break
                                            @default <div class="status waiting"> </div>
                                        @endswitch
                                    </td>
                                    <td>
                                        @if ($order->review_star)
                                            @for ($i = 0; $i < $order->review_star; $i++)
                                                &#9733;
                                            @endfor
                                        @endif
                                    </td>
                                    <td>
                                        @switch($order->status)
                                            @case(0) <div class="actions cancel" onclick="showCancelModal({{ $order->id }})">Cancel</div> @break
                                            @case(2) <div class="actions review" onclick="showReviewModal({{ $order->id }})">Review</div> @break
                                            @default
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('additional-element')
    <div class="ReviewModal" id="ReviewModal">
        <div class="modal-container">
            <form action="{{ route('user.review') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" id="OrderID">
                <div class="modal-header">
                    <h3>Describe your <span>Experience</span></h3>
                    <div class="exit" onclick="closeReviewModal()">&times;</div>
                </div>
                <div class="review-modal-content">
                    <div class="star-review">
                        <input type="radio" name="review_star" id="star1" value="5" onclick="showExperience(5)"
                            required><label for="star1"></label>
                        <input type="radio" name="review_star" id="star2" value="4" onclick="showExperience(4)"
                            required><label for="star2"></label>
                        <input type="radio" name="review_star" id="star3" value="3" onclick="showExperience(3)"
                            required><label for="star3"></label>
                        <input type="radio" name="review_star" id="star4" value="2" onclick="showExperience(2)"
                            required><label for="star4"></label>
                        <input type="radio" name="review_star" id="star5" value="1" onclick="showExperience(1)"
                            required><label for="star5"></label>
                    </div>

                    <div class="experience" id="experience"></div>
                    <textarea name="review_text" id="review" class="type-review"
                        placeholder="Type some review"></textarea>

                </div>
                <div class="modal-footer flex-end">
                    <div class="input-group">
                        <button type="submit" class="form-btn">Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="CancelModal" id="CancelModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3>Cancellation <span>Confirmation</span></h3>
                <div class="exit" onclick="closeCancelModal()">&times;</div>
            </div>
            <div class="modal-content">
                <p>Are you sure you want to cancel this activity?</p>
            </div>
            <div class="modal-footer">
                <button class="cancel-to-cancel" onclick="closeCancelModal()">No</button>
                <form action="{{ route('user.cancel') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" id="orderID">
                    <button class="sure-to-cancel" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
