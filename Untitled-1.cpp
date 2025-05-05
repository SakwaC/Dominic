#include <iostream>
#include <fstream>
#include <cmath> // for mathematical operations (if needed)

using namespace std;

int main() {
    // Variables for input and calculations
    double length, width, area, perimeter;

    // Input values
    cout << "Enter the length of the rectangle: ";
    cin >> length;

    cout << "Enter the width of the rectangle: ";
    cin >> width;

    // Perform calculations
    area = length * width;
    perimeter = 2 * (length + width);

    // Display results
    cout << "The area of the rectangle is: " << area << endl;
    cout << "The perimeter of the rectangle is: " << perimeter << endl;

    // Save results to a file
    ofstream outputFile("rectangle_results.txt");
    if (outputFile.is_open()) {
        outputFile << "Length: " << length << endl;
        outputFile << "Width: " << width << endl;
        outputFile << "Area: " << area << endl;
        outputFile << "Perimeter: " << perimeter << endl;
        outputFile.close();
        cout << "Results saved to rectangle_results.txt" << endl;
    } else {
        cout << "Unable to save results to file." << endl;
    }

    return 0;
}
