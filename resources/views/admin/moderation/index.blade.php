@extends('layouts.admin_layout')
@section('title', 'Отзывы')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="width: 1925px; margin-left: 50px;">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все отзывы</h1>
                        <ul>
                            {{-- <li><a href="{{ route('order') }}" @if (!$statusId) class="active" @endif>Все
                                    заказы</a></li>
                            @foreach ($statuses as $status)
                                <li><a @if ($statusId == $status->id) class="active" @endif
                                        href="{{ route('ordersByStatus', $status->id) }}">{{ $status->name }}</a></li>
                            @endforeach --}}
                        </ul>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%"> ID </th>
                                                    <th> Содержимое отзыва </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviews as $review)
                                                    <tr>
                                                        <td> {{ $review->id }} </td>
                                                        <td>
                                                            {{ $review->text }}
                                                        </td>
                                                        <td>
                                                            @if ($review->moderation == '')
                                                                <div id="moderationReview-{{ $review->id }}">
                                                                    <form
                                                                        action="{{ url('/moderationTrue') }}/{{ $review->id }}"
                                                                        method="POST" class="ajax_moderationTrue"
                                                                        data-id="{{ $review->id }}">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Одобрить</button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ url('/moderationFalse') }}/{{ $review->id }}"
                                                                        method="POST" class="ajax_moderationFalse"
                                                                        data-id="{{ $review->id }}">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Отклонить</button>
                                                                    </form>

                                                                </div>
                                                                <p id="moderationTrue-{{ $review->id }}"
                                                                    style="display: none;">Отзыв одобрен</p>
                                                                <p id="moderationFalse-{{ $review->id }}"
                                                                    style="display: none;">Отзыв отклонен</p>
                                                            @elseif ($review->moderation == 'true')
                                                                <p>Отзыв одобрен</p>
                                                            @elseif($review->moderation == 'false')
                                                                <p>Отзыв отклонен</p>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                    </div><!-- /.col -->

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
    @endsection
