using System.Collections.Generic;
using System.Threading.Tasks;
using FluentAssertions;
using Xunit;

namespace Sam.Coach.Tests
{
    public class UnitTests
    {
        [Theory]
        [InlineData(new int[] { }, new int[] { })]
        [InlineData(new[] { 0 }, new[] { 0 })]
        [InlineData(new[] { 7 }, new[] { 7 })]
        [InlineData(new[] { 4, 6, -3, 3, 7, 9 }, new[] { -3, 3, 7, 9 })]
        [InlineData(new[] { 9, 6, 4, 5, 2, 0 }, new[] { 4, 5 })]
        [InlineData(new[] { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 }, new[] { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 })]
        [InlineData(new[] { 10, 9, 8, 7, 6, 5, 4, 3, 2, 1 }, new[] { 1 })]
        [InlineData(new[] { 1, 2, 2, 3, 4 }, new[] { 2, 3, 4 })]
        [InlineData(new[] { 1, 2, 5, 3, 4, 6 }, new[] { 3, 4, 6 })]
        [InlineData(new[] { -5, -3, -1, -4, -2 }, new[] { -5, -3, -1 })]
        [InlineData(new[] { 5, 5, 5, 5 }, new[] { 5 })]
        [InlineData(new[] { 1, 2 }, new[] { 1, 2 })]
        [InlineData(new[] { 2, 1 }, new[] { 1 })]
        [InlineData(new[] { 1, 3, 2, 4, 5, 7, 6, 8, 9, 10 }, new[] { 6, 8, 9, 10 })]
        
        public async Task Can_Find(IEnumerable<int> data, IEnumerable<int> expected)
        {
            ILongestRisingSequenceFinder finder = new LongestRisingSequenceFinder();
            var actual = await finder.Find(data);
            actual.Should().Equal(expected);
        }
    }
}