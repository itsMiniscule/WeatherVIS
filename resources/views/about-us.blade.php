
@extends('layouts.app')

@section('content')
    <div class="hero-section" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div class="hero-content">
            <h1>About Us</h1>
            <p>We are a dedicated team of professionals committed to delivering top-notch software solutions.</p>
        </div>
    </div>

    <div class="container team-section">
        <h2>Our Leadership Team</h2>
        <p class="team-intro">With over 100 years of combined experience, we’ve got a well-seasoned team at the helm.</p>
        <div class="row justify-content-center">
            @foreach ($teamMembers as $member)
                <div class="col-md-4 mb-4">
                    <div class="team-member card shadow-sm" onclick="showModal('{{ $member['name'] }}', '{{ $member['position'] }}', '{{ $member['image'] }}', '{{ $member['description'] }}')">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/team/' . $member['image']) }}" class="rounded-circle mx-auto d-block team-member-img" alt="{{ $member['name'] }}">
                            <h5 class="card-title mt-3">{{ $member['name'] }}</h5>
                            <p class="card-text">{{ $member['position'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="teamMemberModal" tabindex="-1" role="dialog" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teamMemberModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="teamMemberImage" class="img-fluid rounded-circle mb-3" alt="">
                    <p id="teamMemberDescription"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showModal(name, position, image, description) {
            $('#teamMemberModalLabel').text(name + ' - ' + position);
            $('#teamMemberImage').attr('src', '{{ asset('images/team/') }}/' + image);
            $('#teamMemberDescription').text(description);
            $('#teamMemberModal').modal('show');
        }
    </script>
@endsection
