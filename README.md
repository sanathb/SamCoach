- To build and run unit tests
  - `dotnet clean`
  - `dotnet restore`
  - `doenet build`
  - `dotnet test`

- Scope for improvement
  - Provide interface for the user to input data
  - Validation of input. Here we assume it is integer data, can have validation when we have user input.

- Assumptions
  - We show the latest sequence when the length of the previous longest sequence is same. Therefore we have used >=
  - Incase there are multiple longest sequences of same length, then we take latest sequence.

