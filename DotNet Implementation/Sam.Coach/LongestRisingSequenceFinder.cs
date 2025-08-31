using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Sam.Coach
{
    public class LongestRisingSequenceFinder : ILongestRisingSequenceFinder
    {
        public Task<IEnumerable<int>> Find(IEnumerable<int> numbers) => Task.Run(() =>
        {
            var numbersList = numbers.ToList();
            
            if (!numbersList.Any())
            {
                return Enumerable.Empty<int>();
            }

            if (numbersList.Count == 1)
            {
                return numbersList.AsEnumerable();
            }

            var longestSequence = new List<int>();
            var currentSequence = new List<int> { numbersList[0] };

            for (int i = 1; i < numbersList.Count; i++)
            {
                // If the number is greater than the last element in the current sequence,
                // add it to end of the list
                if (numbersList[i] > currentSequence.Last())
                {
                    currentSequence.Add(numbersList[i]);
                }
                else
                {
                    if (currentSequence.Count > longestSequence.Count)
                    {
                        longestSequence = new List<int>(currentSequence);
                    }
                    // Reset and start new sequence
                    currentSequence = new List<int> { numbersList[i] };
                }
            }

            // If the current sequence after exhausting all elements in the array
            // is longer or equal. I am adding = assuming we need the latest sequence in case of same length
            if (currentSequence.Count >= longestSequence.Count)
            {
                longestSequence = currentSequence;
            }

            return longestSequence.AsEnumerable();
        });
    }
}