# startsAt60
Project task list

The Puzzle

Generate 100 random points in a 2 dimensional grid between (0,0) and (1000,1000). You don't need a visual representation, but if you had one it would look something like:

dots

Imagine a circle with diameter 900 centered in the grid. Count the number of points generated above that occur within the circle. HINT: A point is within the circle if it is less than the radius distance from the centre of the circle. The distance between two points is given by the Euclidean distance. You don't need a visual representation, but if you had one it would look something like:

dots with circle

Calculate the percentage of points that occur within the circle.

Using the percentage of points that occur within the circle estimate the area of the circle. HINT: If 50% of the points are within the circle then the area of the circle is approximately 50% of the area of grid.

We now have an estimated area for a circle with a known radius. Use the formula Area = PI * Radius * Radius to estimate a value for PI. Write the result to the console. Congratulations you have now estimated a value for PI by Monte Carlo simulation!

Each time you run your simulation you will get a different result due to the randomness. Modify your solution to run the simulation 10 times and report the average value of the 10 results. Write the result to the console.

Modify your program to expect four console arguments (gridSize, circleDiameter, n, iterations). n is the number of points to generate, iterations is the number of times to run the calculation before averaging the result. The program should calculate an estimated value for PI and write it to the console.