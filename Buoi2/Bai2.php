<?php
    class Movie {
        private string $title;
        private string $id;
        private int $totalSeats;
        private int $availableSeats;
        private float $price;

        public function __construct(string $id, string $title, float $price, int $totalSeats) {
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
            $this->totalSeats = $totalSeats;
            $this->availableSeats = $totalSeats;
        }

        public function getTitle(): string {
            return $this->title;
        }

        public function getid(): string {
            return $this->id;
        }

        public function gettotalSeats(): int {
            return $this->totalSeats;
        }

        public function getprice(): float {
            return $this->price;
        }

        public function bookTicket($quantity): bool {
            if ($quantity <= $this->availableSeats && $quantity > 0) {
                $this->availableSeats -= $quantity;
                return true;
            }
            return false;
        }
        public function cancelTicket($quantity): bool {
            if ($quantity <= ($this->totalSeats - $this->availableSeats) && $quantity > 0) {
                $this->availableSeats += $quantity;
                return true;
            }
            return false;
        }
        public function getSoldSeats(): int {
            return $this->totalSeats - $this->availableSeats;
        }
        public function getRevenue(): float {
            return $this->getSoldSeats() * $this->price;
        }
        public function displayInfo(): void {
            echo "  - ID: " . $this->id . "<br>";
            echo "  - Tên phim: " . $this->title . "<br>";
            echo "  - Giá vé: " . number_format($this->price, 2) . "<br>";
            echo "  - Tổng số ghế: " . $this->totalSeats . "<br>";
            echo "  - Số ghế còn trống: " . $this->availableSeats . "<br>";
            echo "  - Số ghế đã bán: " . $this->getSoldSeats() . "<br>";
            echo "  - Doanh thu: " . number_format($this->getRevenue(), 2) . "<br><br>";
        }

        public function findMovieById($movies, $id): ?Movie {
            foreach ($movies as $movie) {
                if ($movie->getid() === $id) {
                    return $movie;
                }
            }
            return null;
        }
        public function getTotalRevenue($movies): float {
            $totalRevenue = 0.0;
            foreach ($movies as $movie) {
                $totalRevenue += $movie->getRevenue();
            }
            return $totalRevenue;
        }

        public function getBestSellingMovie($movies): ?Movie {
            $bestSellingMovie = null;
            $maxSoldSeats = 0;
            foreach ($movies as $movie) {
                if ($movie->getSoldSeats() > $maxSoldSeats) {
                    $maxSoldSeats = $movie->getSoldSeats();
                    $bestSellingMovie = $movie;
                }
            }
            return $bestSellingMovie;
        }
    }
    class MovieCollection {
        private array $movies = [];

        public function addMovie(Movie $movie): void {
            $this->movies[] = $movie;
        }

        public function getMovie(int $index): ?Movie {
            return $this->movies[$index] ?? null;
        }

        public function getTotalRevenue(): float {
            $totalRevenue = 0.0;
            foreach ($this->movies as $movie) {
                $totalRevenue += $movie->getRevenue();
            }
            return $totalRevenue;
        }

        public function getBestSellingMovie(): ?Movie {
            $bestSellingMovie = null;
            $maxSoldSeats = 0;
            foreach ($this->movies as $movie) {
                if ($movie->getSoldSeats() > $maxSoldSeats) {
                    $maxSoldSeats = $movie->getSoldSeats();
                    $bestSellingMovie = $movie;
                }
            }
            return $bestSellingMovie;
        }
    }
    $movie1 = new Movie("1", "Avengers", 100000.0, 100);
    $movie2 = new Movie("2", "Avatar", 80000.0, 80);
    $movie3 = new Movie("3", "Batman", 90000.0, 120);
    $movies = new MovieCollection();
    $movies->addMovie($movie1);
    $movies->addMovie($movie2);
    $movies->addMovie($movie3);
    $movie1->bookTicket(20);
    $movie2->bookTicket(10);
    $movie1->cancelTicket(10);
    $movies->getMovie(0)->displayInfo();
    $movies->getMovie(1)->displayInfo();
    $movies->getMovie(2)->displayInfo();

    $totalRevenue = $movies->getTotalRevenue();
    echo "Tổng doanh thu: " . number_format($totalRevenue, 2) . "<br>";

    $bestSellingMovie = $movies->getBestSellingMovie();
    if ($bestSellingMovie) {
        echo "Phim bán chạy nhất: " . $bestSellingMovie->getTitle() . "<br>";
    }

?>