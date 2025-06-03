@extends('layouts.app')

@section('content')
<style>
    .ticket-header {
        font-size: 2.5rem;
        font-weight: 800;
        text-align: center;
        margin-top: 2rem;
        color: #6C2BD9;
    }

    .sub-header {
        font-size: 1.25rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 2rem;
    }

    .ticket-list-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1.5rem;
        padding: 0 2rem;
    }

    .ticket-card {
        background-color: #6C2BD9;
        color: white;
        border-radius: 12px;
        width: 300px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .ticket-card .background {
        position: relative;
        height: 150px;
        background-image: url('/images/fireworks.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1rem;
        color: white;
    }

    .ticket-card .background .event-title {
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .ticket-card .info {
        padding: 1rem;
        background-color: #6C2BD9;
    }

    .ticket-card .info p {
        margin: 0.3rem 0;
    }

    .ticket-card .status {
        font-weight: bold;
        color: white;
        margin-top: 0.5rem;
    }

    .ticket-date {
        text-align: center;
        margin-top: 1rem;
        font-weight: 500;
    }
</style>

<div class="container">
    <h1 class="ticket-header">Ticket List</h1>
    <h3 class="sub-header">Your Tickets</h3>

    <div class="ticket-list-container">

        <!-- Ticket 1 -->
        <div class="ticket-card">
            <div class="ticket-date">05 January 2025</div>
            <div class="background">
                <div class="event-title">Noah Band</div>
                <div>x3 Tickets</div>
                <div>Lagoon Mall 3rd Floor</div>
            </div>
            <div class="info">
                <div class="status">Purchase Successful</div>
            </div>
        </div>

        <!-- Ticket 2 -->
        <div class="ticket-card">
            <div class="ticket-date">30 May 2025</div>
            <div class="background">
                <div class="event-title">JKT48</div>
                <div>x3 Tickets</div>
                <div>Grand Indonesia 2nd Floor</div>
            </div>
            <div class="info">
                <div class="status">Purchase Successful</div>
            </div>
        </div>

        <!-- Ticket 3 -->
        <div class="ticket-card">
            <div class="ticket-date">01 February 2025</div>
            <div class="background">
                <div class="event-title">Dewa 19</div>
                <div>x3 Tickets</div>
                <div>The Taman Dayu Park</div>
            </div>
            <div class="info">
                <div class="status">Purchase Successful</div>
            </div>
        </div>

        <!-- Tambah lebih banyak tiket sesuai kebutuhan -->

    </div>
</div>
@endsection
