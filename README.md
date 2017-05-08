# Experiment: Performance of PHP references

This project explains how [PHP references](http://php.net/manual/en/language.references.php) affects to performance.

PhpBench version of http://tanakahisateru.hatenablog.jp/entry/2013/12/12/012728 (Japanese)

## Results

```
$ ./bench.sh
Docker PHP 7.1

PhpBench 0.13.0. Running benchmarks.
Using configuration file: /bench/phpbench.json

....... 

7 subjects, 50 iterations, 600 revs, 0 rejects
(best [mean mode] worst) = 0.090 [121.947 118.595] 0.420 (μs)
⅀T: 4,272.480μs μSD/r 4.775μs μRSD/r: 50.329%
suite: 133c70c5ff922bbc5191b1588f682c5dfb69caf9, date: 2017-05-08, stime: 08:35:47
+-------------+--------------------------+--------------+-----------+------------+
| php_version | benchmark                | subject      | mean      | mem_peak   |
+-------------+--------------------------+--------------+-----------+------------+
| 7.1.4       | PhpReferenceBench01Nop   | benchNoRef   | 0.272μs   | 4,931,064b |
| 7.1.4       | PhpReferenceBench01Nop   | benchRefArg  | 0.440μs   | 4,931,064b |
| 7.1.4       | PhpReferenceBench01Nop   | benchRefBoth | 0.292μs   | 4,931,064b |
| 7.1.4       | PhpReferenceBench02GetAt | benchNoRef   | 0.252μs   | 4,930,624b |
| 7.1.4       | PhpReferenceBench02GetAt | benchRefArg  | 0.340μs   | 4,930,624b |
| 7.1.4       | PhpReferenceBench03X2At  | benchNoRef   | 851.756μs | 9,090,264b |
| 7.1.4       | PhpReferenceBench03X2At  | benchRefArg  | 0.280μs   | 4,930,624b |
+-------------+--------------------------+--------------+-----------+------------+

Docker PHP 5.6

PhpBench 0.13.0. Running benchmarks.
Using configuration file: /bench/phpbench.json

....... 

7 subjects, 50 iterations, 600 revs, 0 rejects
(best [mean mode] worst) = 0.210 [3,993.105 3,991.848] 0.620 (μs)
⅀T: 139,766.680μs μSD/r 63.872μs μRSD/r: 15.733%
suite: 133c70c8316e9a7d067931c889283c35034b10c2, date: 2017-05-08, stime: 08:36:01
+-------------+--------------------------+--------------+-------------+-------------+
| php_version | benchmark                | subject      | mean        | mem_peak    |
+-------------+--------------------------+--------------+-------------+-------------+
| 5.6.30      | PhpReferenceBench01Nop   | benchNoRef   | 0.426μs     | 15,397,728b |
| 5.6.30      | PhpReferenceBench01Nop   | benchRefArg  | 7,055.564μs | 25,238,984b |
| 5.6.30      | PhpReferenceBench01Nop   | benchRefBoth | 6,851.114μs | 25,238,984b |
| 5.6.30      | PhpReferenceBench02GetAt | benchNoRef   | 0.519μs     | 15,397,064b |
| 5.6.30      | PhpReferenceBench02GetAt | benchRefArg  | 0.658μs     | 15,397,064b |
| 5.6.30      | PhpReferenceBench03X2At  | benchNoRef   | 7,066.228μs | 25,238,264b |
| 5.6.30      | PhpReferenceBench03X2At  | benchRefArg  | 6,977.224μs | 25,238,264b |
+-------------+--------------------------+--------------+-------------+-------------+
```

Totally **Copy On Write** strategy automatically reduces copies of array and elements.
Especially PHP >= 7.0, copy executed when only really modified.

PHP references has no effects on read access today. Accessing without references can
always get better performance. Though it costs when returning some modified copy, but
I prefer to use object pointer instead of referenced array argument.
