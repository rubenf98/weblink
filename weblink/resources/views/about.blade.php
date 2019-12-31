@extends('layout')

@section('content')
<div class="about-container">
    <div class="imgAbout"></div>

    <div class="header">
        <h1>About</h1>
        <p>What is WebLink?</p>
    </div>

    <div class="about-section">
        <div class="about">
            <p>
                WebLink is a website to allows you to review other project aswell as to gain inspiration and creativity
                for future projects. We consider ourself a "hub" of projects that unite the best of programming workers
                and allows the sahring of knowledge.
            </p>
        </div>

        <img src="/images/about/question.svg" class="image">
    </div>

    <div class="header">
        <h1>Team</h1>
        <p>The team that built the entire project</p>
    </div>

    <div class="team-section">
        <div class="team">
            <div class="team-member">
                <h4>José Rúben Silva Freitas</h4>
                <p>2041716</p>
            </div>
            <div class="team-member">
                <h4>Leonardo Tadeu Nunes Abreu</h4>
                <p>2067513</p>
            </div>

        </div>

        <img src="/images/about/team.svg" class="image">
    </div>
</div>

@endsection