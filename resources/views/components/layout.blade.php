<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Call System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @livewireStyles
        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased w-screen h-screen">

        {{ $slot }}
    
        @livewireScripts
        <script>

            window.Alpine = Alpine
 
            // Alpine.start()
            function clock(timeDifferenceInSeconds) {

                let date = new Date()

                return {
                    timeDifference: Date.parse(timeDifferenceInSeconds),
                    formattedTime: '',
                    intervalId: null, // Store the interval ID for later clearing

                    startClock() {
                        // Clear existing interval
                        this.clearClock();

                        // Update formattedTime periodically based on timeDifference
                        this.intervalId = setInterval(() => {
                            const currentTime = new Date();
                            const userCreationTime = new Date(currentTime.getTime() - this.timeDifference);

                            // Format the time as "mm:ss"
                            this.formattedTime = this.formatTime(userCreationTime);
                        }, 1000); // Update every second
                    },

                    clearClock() {
                        // Clear the interval if it's set
                        if (this.intervalId !== null) {
                            clearInterval(this.intervalId);
                            this.intervalId = null;
                        }
                    },

                    formatTime(time) {
                        // Get minutes and seconds
                        // const hours = time.getHours().toString().padStart(1, '0');
                        const minutes = time.getMinutes().toString().padStart(2, '0');
                        const seconds = time.getSeconds().toString().padStart(2, '0');

                        // console.log(hours);

                        // Return the formatted time
                        return `${minutes}:${seconds}`;
                    },
                };
            }
        </script>
    </body>
</html>