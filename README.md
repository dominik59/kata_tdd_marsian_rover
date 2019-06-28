# How to start?

0. Clone repository
0. Open terminal
0. Go to directory where you cloned this repository
0. Run command: git checkout 9f923a98
0. Run powershell ./build-environment.ps1
0. Open directory where you cloned this repository with PHP Storm
0. Check whether you are able to run "RUN ALL TESTS" configuration
0. This should execute one test and it should end with "green"
0. Delete tests/ExampleTest.php and start with your KATA
0. Have fun!

# What we will be working on ?

http://kata-log.rocks/mars-rover-kata

# What is a plan for KATA meeting ?

0. First, we will discuss what we will be working on and what we want to accomplish
0. Then we will work separately (or in pairs) to meet the following requirements:

    0. You are given the initial starting point (x,y) of a rover and the direction (N,S,E,W) it is facing.
    0. The rover receives a character array of commands. For example ['f', 'l', 'b', 'r']. Assuming that initial rover starting point is (x=>0, y=>0, "N") this should move rover to (x=>1, y=>1, "N")
    0. Implement commands that move the rover forward/backward (f,b).
    0. Implement commands that turn the rover left/right (l,r).
    0. Implement obstacle detection before each move to a new square. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point, aborts the sequence and reports the obstacle.
    
0. We will work continuously and 20 minutes before KATA will end, we will stop and show how we completed our goals. It does not matter how far we will get but how we will get there. 
